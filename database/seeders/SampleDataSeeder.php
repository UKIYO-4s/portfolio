<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Photo;
use App\Models\Product;

class SampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample Projects
        Project::create([
            'title' => 'E-Commerce Platform',
            'description' => 'A modern e-commerce platform built with Laravel and Vue.js, featuring real-time inventory management and seamless payment integration.',
            'url' => 'https://example.com',
            'github_url' => 'https://github.com/example/ecommerce',
            'technologies' => ['Laravel', 'Vue.js', 'Tailwind CSS', 'Stripe'],
            'featured' => true,
            'order' => 1,
        ]);

        Project::create([
            'title' => 'Task Management App',
            'description' => 'Collaborative task management application with real-time updates, team collaboration features, and intuitive drag-and-drop interface.',
            'url' => 'https://example.com/tasks',
            'github_url' => 'https://github.com/example/tasks',
            'technologies' => ['React', 'Node.js', 'MongoDB', 'Socket.io'],
            'featured' => true,
            'order' => 2,
        ]);

        Project::create([
            'title' => 'Portfolio Website',
            'description' => 'Minimalist portfolio website showcasing creative work with smooth animations and responsive design.',
            'url' => 'https://example.com/portfolio',
            'technologies' => ['Next.js', 'Tailwind CSS', 'Framer Motion'],
            'featured' => true,
            'order' => 3,
        ]);

        // Sample Photos
        Photo::create([
            'title' => 'Urban Landscape',
            'description' => 'Modern architecture captured during golden hour',
            'category' => 'Architecture',
            'featured' => true,
            'order' => 1,
        ]);

        Photo::create([
            'title' => 'Mountain Vista',
            'description' => 'Breathtaking mountain scenery at sunrise',
            'category' => 'Nature',
            'featured' => true,
            'order' => 2,
        ]);

        Photo::create([
            'title' => 'City Lights',
            'description' => 'Night photography of city skyline',
            'category' => 'Urban',
            'featured' => true,
            'order' => 3,
        ]);

        Photo::create([
            'title' => 'Portrait Study',
            'description' => 'Black and white portrait with natural lighting',
            'category' => 'Portrait',
            'featured' => false,
            'order' => 4,
        ]);

        // Sample Products
        Product::create([
            'name' => 'Web Development Course',
            'description' => 'Complete web development course covering HTML, CSS, JavaScript, and modern frameworks. Includes 50+ hours of video content, exercises, and projects.',
            'price' => 9900,
            'file_name' => 'web-dev-course.zip',
            'file_size' => 5242880, // 5MB
            'is_active' => true,
            'downloads' => 0,
        ]);

        Product::create([
            'name' => 'UI Design System',
            'description' => 'Professional UI design system with 200+ components, icons, and templates. Compatible with Figma, Sketch, and Adobe XD.',
            'price' => 4900,
            'file_name' => 'ui-design-system.zip',
            'file_size' => 10485760, // 10MB
            'is_active' => true,
            'downloads' => 0,
        ]);

        Product::create([
            'name' => 'Photography Presets Pack',
            'description' => 'Collection of 50 professional photography presets for Lightroom and Capture One. Perfect for landscape, portrait, and street photography.',
            'price' => 2900,
            'file_name' => 'photo-presets.zip',
            'file_size' => 2097152, // 2MB
            'is_active' => true,
            'downloads' => 0,
        ]);

        echo "Sample data created successfully!\n";
        echo "- 3 Projects\n";
        echo "- 4 Photos (note: image files need to be uploaded via admin panel)\n";
        echo "- 3 Products (note: product files need to be uploaded via admin panel)\n";
    }
}
