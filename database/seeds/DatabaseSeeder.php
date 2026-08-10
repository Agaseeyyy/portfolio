<?php

/**
 * Database Seeder
 * 
 * Seeds all portfolio tables with default data on first run.
 * Core classes are loaded via bootstrap.php.
 */

use app\core\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the seeder
     */
    public function run(): void
    {
        $this->seedHome();
        $this->seedContactInfo();
        $this->seedTechstack();
        $this->seedProjects();
    }

    /**
     * Seed personal information (home section)
     */
    private function seedHome(): void
    {
        if (!$this->isTableEmpty('home_tbl')) return;

        $this->insert('home_tbl', [
            'name'          => 'Agassi Bustarga',
            'role'          => 'Student Developer',
            'short_bio'     => 'A passionate and dedicated information technology student with a knack for problem-solving and a love for coding. Eager to learn and grow in the tech industry.',
            'profile_photo' => 'images/def-avatar.png'
        ]);
    }

    /**
     * Seed contact information
     */
    private function seedContactInfo(): void
    {
        if (!$this->isTableEmpty('contact_info_tbl')) return;

        $this->insert('contact_info_tbl', [
            'email'          => 'bustargaagassi1018@gmail.com',
            'address'        => 'Philippines',
            'github_link'    => 'https://github.com/agaseeyyy',
            'linkedin_link'  => 'https://linkedin.com/in/agassi-bustarga',
            'instagram_link' => 'https://instagram.com/_agaseeyyy'
        ]);
    }

    /**
     * Seed tech stack with categorized technologies
     */
    private function seedTechstack(): void
    {
        if (!$this->isTableEmpty('techstack_tbl')) return;

        $techstack = [
            // Frontend
            ['tech_name' => 'HTML',         'icon' => 'icons/html-tag.svg',    'category' => 'frontend'],
            ['tech_name' => 'CSS',          'icon' => 'icons/css.svg',         'category' => 'frontend'],
            ['tech_name' => 'JavaScript',   'icon' => 'icons/javascript.svg',  'category' => 'frontend'],
            ['tech_name' => 'React',        'icon' => 'icons/react.svg',       'category' => 'frontend'],
            ['tech_name' => 'Tailwind CSS', 'icon' => 'icons/tailwind.svg',    'category' => 'frontend'],
            ['tech_name' => 'Figma',        'icon' => 'icons/figma.svg',       'category' => 'frontend'],
            // Backend
            ['tech_name' => 'PHP',          'icon' => 'icons/php.svg',         'category' => 'backend'],
            ['tech_name' => 'Laravel',      'icon' => 'icons/laravel.svg',     'category' => 'backend'],
            ['tech_name' => 'Java',         'icon' => 'icons/java.svg',        'category' => 'backend'],
            ['tech_name' => 'Spring Boot',  'icon' => 'icons/spring-boot.svg', 'category' => 'backend'],
            // Database
            ['tech_name' => 'MySQL',        'icon' => 'icons/mysql.svg',       'category' => 'database'],
            // Tools
            ['tech_name' => 'Git',          'icon' => 'icons/git.svg',         'category' => 'tools'],
            ['tech_name' => 'GitHub',       'icon' => 'icons/github.svg',      'category' => 'tools'],
            ['tech_name' => 'VS Code',      'icon' => 'icons/vscode.svg',      'category' => 'tools'],
            ['tech_name' => 'Postman',      'icon' => 'icons/postman.svg',     'category' => 'tools'],
            ['tech_name' => 'Linux',        'icon' => 'icons/linux.svg',       'category' => 'tools'],
            ['tech_name' => 'Terminal',     'icon' => 'icons/terminal.svg',    'category' => 'tools'],
        ];

        foreach ($techstack as $tech) {
            $this->insert('techstack_tbl', $tech);
        }
    }

    /**
     * Seed sample projects with detailed information
     */
    private function seedProjects(): void
    {
        if (!$this->isTableEmpty('projects_tbl')) return;

        $projects = [
            [
                'project_name' => 'Portfolio Website',
                'description'  => 'A responsive portfolio website powered by a custom-built PHP MVC architecture and Tailwind CSS.',
                'long_description' => 'This portfolio showcases my skills and projects through a clean, modern interface. Built from scratch using a custom PHP MVC framework, it demonstrates my understanding of web architecture patterns, routing, and template systems. The frontend utilizes Tailwind CSS for rapid styling and full responsiveness across all devices.',
                'role' => 'Full-stack Developer',
                'key_features' => json_encode([
                    'Custom PHP MVC framework with routing system',
                    'Admin panel for content management',
                    'Responsive design with Tailwind CSS',
                    'Animated UI elements and smooth transitions',
                    'Contact form with email integration'
                ]),
                'challenges' => json_encode([
                    'Built a lightweight MVC framework from scratch without relying on existing solutions',
                    'Implemented a flexible routing system supporting dynamic parameters',
                    'Created a reusable component system for the admin panel'
                ]),
                'image'        => null,
                'preview_link' => 'https://agassi-portfolio.com',
                'project_link' => 'https://github.com/agaseeyyy/portfolio-v2',
                'start_date'   => '2025-11-01',
                'end_date'     => '2025-12-01',
                'technologies' => ['PHP', 'Tailwind CSS', 'JavaScript', 'MySQL'],
            ],
            [
                'project_name' => 'JPCS Financial Tracking System',
                'description'  => 'A comprehensive transparency management system with features for tracking payments, remittance, and expenses for JPCS-CSPC Organization.',
                'long_description' => 'Developed for the Junior Philippine Computer Society (JPCS) student organization, this system provides complete financial transparency. It allows officers to record all transactions, generate reports, and give members visibility into how organizational funds are being used. The system features role-based access control and audit logging.',
                'role' => 'Lead Developer',
                'key_features' => json_encode([
                    'Real-time financial dashboard with charts',
                    'Transaction recording with receipt uploads',
                    'Automated report generation (PDF/Excel)',
                    'Role-based access control for officers and members',
                    'Complete audit trail for all transactions'
                ]),
                'challenges' => json_encode([
                    'Designed a secure authentication system with multiple user roles',
                    'Implemented complex financial calculations and reporting',
                    'Built a responsive SPA frontend with React for optimal user experience'
                ]),
                'image'        => null,
                'preview_link' => null,
                'project_link' => 'https://github.com/agaseeyyy/student-management',
                'start_date'   => '2025-09-01',
                'end_date'     => '2025-10-15',
                'technologies' => ['Java', 'Spring Boot', 'React', 'MySQL'],
            ],
            [
                'project_name' => 'E-Commerce Platform',
                'description'  => 'A full-featured e-commerce platform with product catalog, shopping cart, and payment integration.',
                'long_description' => 'A complete online shopping solution built with Laravel. Features include product management, inventory tracking, customer accounts, order processing, and integration with major payment gateways. The platform is designed to be scalable and can handle high traffic loads.',
                'role' => 'Backend Developer',
                'key_features' => json_encode([
                    'Product catalog with categories and search',
                    'Shopping cart with persistent sessions',
                    'Secure payment gateway integration',
                    'Order tracking and history',
                    'Admin dashboard for inventory management'
                ]),
                'challenges' => json_encode([
                    'Implemented secure payment processing with proper error handling',
                    'Optimized database queries for large product catalogs',
                    'Built a caching layer to improve page load performance'
                ]),
                'image'        => null,
                'preview_link' => null,
                'project_link' => 'https://github.com/agaseeyyy/ecommerce-platform',
                'start_date'   => '2025-06-01',
                'end_date'     => '2025-08-30',
                'technologies' => ['PHP', 'Laravel', 'JavaScript', 'MySQL'],
            ],
            [
                'project_name' => 'Task Management App',
                'description'  => 'A collaborative task management application with real-time updates and team features.',
                'long_description' => 'Built to help teams organize their work efficiently. This application provides a Kanban-style board for visual task management, real-time collaboration features, and detailed analytics on team productivity. Supports multiple workspaces and projects.',
                'role' => 'Full-stack Developer',
                'key_features' => json_encode([
                    'Drag-and-drop Kanban boards',
                    'Real-time updates via WebSocket',
                    'Team workspaces and permissions',
                    'Task comments and file attachments',
                    'Productivity analytics dashboard'
                ]),
                'challenges' => json_encode([
                    'Implemented WebSocket connections for live collaboration',
                    'Designed an efficient notification system for team updates',
                    'Built responsive drag-and-drop functionality from scratch'
                ]),
                'image'        => null,
                'preview_link' => 'https://tasks-demo.agassi.dev',
                'project_link' => 'https://github.com/agaseeyyy/task-app',
                'start_date'   => '2025-03-01',
                'end_date'     => '2025-05-15',
                'technologies' => ['React', 'JavaScript', 'PHP', 'MySQL'],
            ],
        ];

        foreach ($projects as $project) {
            $technologies = $project['technologies'];
            unset($project['technologies']);

            $projectId = $this->insert('projects_tbl', $project);

            // Link technologies to project
            foreach ($technologies as $techName) {
                $techId = $this->getValue('techstack_tbl', 'tech_id', 'tech_name', $techName);
                if ($techId) {
                    $this->insert('project_technologies_tbl', [
                        'project_id' => $projectId,
                        'tech_id'    => $techId
                    ]);
                }
            }
        }
    }
}
