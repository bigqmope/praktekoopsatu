<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="edit.css">
    </head>
    <body>
        <h2 style="text-align: center;">Praktikum 5.1</h2>
            
    <?php
    // ========== 1. NAMESPACE ==========
    namespace App; 
    
    // ========== 2. TRAIT ==========
    trait Logger {
        public function log($pesan) {
            echo "[LOG]: $pesan\n";
        }
    }
    
    // ========== 3. INTERFACE untuk Polymorphism ==========
    interface Notifiable {
        public function notify(string $pesan): void;
    }
    
    // ========== 4. CLASS USER dasar ==========
    class User {
        // (Scope + Encapsulation) -> properti private
        private $username;
        private $password;
    
        // (Magic Method: __construct)
        public function __construct(string $username, string $password) {
            $this->username = $username;
            $this->password = $password;
        }
    
        // Getter
        public function getUsername(): string {
            return $this->username;
        }
    
        // (Exception Handling)
        public function login(string $username, string $password): string {
            if ($this->username !== $username || $this->password !== $password) {
                throw new \Exception("Login gagal! Username atau password salah.");
            }
            return "Selamat {$this->username}, Anda berhasil login!";
        }
    }
    
    // ========== 5. TASK ==========
    class Task {
        public string $judul;
        public string $status;
        public ?User $assignedTo;
    
        public function __construct(string $judul, string $status = "belum selesai", ?User $assignedTo = null) {
            $this->judul = $judul;
            $this->status = $status;
            $this->assignedTo = $assignedTo;
        }
    
        public function updateStatus(string $newStatus): void {
            $this->status = $newStatus;
        }
    }
    
    // ========== 6. PROJECT ==========
    class Project implements \IteratorAggregate {
        use Logger; // (Trait)
    
        private string $nama;
        private string $deadline;
        private array $tasks = [];
    
        // (Static Property)
        private static int $projectCount = 0;
    
        public function __construct(string $nama, string $deadline) {
            $this->nama = $nama;
            $this->deadline = $deadline;
            self::$projectCount++;
        }
    
        public function addTask(Task $task): void {
            $this->tasks[] = $task;
        }
    
        public function getNama(): string {
            return $this->nama;
        }
    
        public function getProgres(): float {
            if (count($this->tasks) === 0) return 0;
            $done = 0;
            foreach ($this->tasks as $task) {
                if ($task->status === "selesai") $done++;
            }
            return ($done / count($this->tasks)) * 100;
        }
    
        // (Object Iteration)
        public function getIterator(): \Traversable {
            return new \ArrayIterator($this->tasks);
        }
    
        // (Class Constant)
        const VERSION = "1.0";
    
        // (Static Method)
        public static function getTotalProjects(): int {
            return self::$projectCount;
        }
    }
    
    // ========== 7. MANAGER ==========
    final class Manager extends User implements Notifiable {
        private array $projects = [];
        private $notifier;
    
        // (Dependency Injection)
        public function __construct(string $username, string $password, Notifiable $notifier = null) {
            parent::__construct($username, $password);
            $this->notifier = $notifier;
        }
    
        public function tambahProject(Project $project): void {
            $this->projects[] = $project;
            if ($this->notifier) {
                $this->notifier->notify("Project {$project->getNama()} ditambahkan.");
            }
        }
    
        public function getProjects(): array {
            return $this->projects;
        }
    
        // (Polymorphism -> dari interface Notifiable)
        public function notify(string $pesan): void {
            echo "Notif untuk Manager {$this->getUsername()}: $pesan\n";
        }
    }
    
    // ========== 8. TEAM MEMBER ==========
    class Team extends User implements Notifiable {
        public function updateTask(Task $task, string $status): void {
            $task->updateStatus($status);
        }
    
        public function notify(string $pesan): void {
            echo "Notif untuk Member {$this->getUsername()}: $pesan\n";
        }
    }
    
    // ========== 9. VIEW (MVC) ==========
    class ProjectView {
        public function showProgress(Project $project): void {
            echo "Progress Project '{$project->getNama()}': " . $project->getProgres() . "%\n";
        }
    }
    
    // ========== 10. CONTROLLER (MVC) ==========
    class ProjectController {
        private Project $project;
        private ProjectView $view;
    
        public function __construct(Project $project, ProjectView $view) {
            $this->project = $project;
            $this->view = $view;
        }
    
        public function tampilkanProgress(): void {
            $this->view->showProgress($this->project);
        }
    }
    
    // ========== 11. Late Static Binding ==========
    class BaseUser {
        public static function role(): string {
            return "BaseUser";
        }
    
        public static function whoAmI(): string {
            return static::role(); // beda dengan self::role()
        }
    }
    class AdminUser extends BaseUser {
        public static function role(): string {
            return "AdminUser";
        }
    }
    
    // ========== 12. DEMO PROGRAM ==========
    try {
        $manager = new Manager("budi", "1234");
        echo $manager->login("budi", "1234") . "\n";
    
        $project = new Project("Sistem Informasi", "2025-12-31");
        $task1 = new Task("Buat Database");
        $task2 = new Task("Desain UI", "selesai");
    
        $project->addTask($task1);
        $project->addTask($task2);
    
        $manager->tambahProject($project);
    
        // Iterasi Task (Object Iteration)
        foreach ($project as $task) {
            echo "- Task: {$task->judul}, Status: {$task->status}\n";
        }
    
        // MVC
        $view = new ProjectView();
        $controller = new ProjectController($project, $view);
        $controller->tampilkanProgress();
    
        // Cloning Object
        $cloneProject = clone $project;
        echo "Clone project dibuat: {$cloneProject->getNama()}\n";
    
        // Serialization
        $serialized = serialize($project);
        echo "Serialized: $serialized\n";
        $unserialized = unserialize($serialized);
    
        // Reflection
        $ref = new \ReflectionClass(Manager::class);
        echo "Class Manager punya method: ";
        foreach ($ref->getMethods() as $method) {
            echo $method->name . " ";
        }
        echo "\n";
    
        // Anonymous Class
        $anon = new class {
            public function halo() { return "Halo dari Anonymous Class!"; }
        };
        echo $anon->halo() . "\n";
    
        // Late Static Binding
        echo BaseUser::whoAmI() . "\n";  // BaseUser
        echo AdminUser::whoAmI() . "\n"; // AdminUser
    
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
    <br>
    <br>
    <a href="index.php">Kembali ke halaman Index</a>
</body>
</html>
