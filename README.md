
# Volleyball league 

## Description

This web application is designed to create and organize a volleyball league. The application is developed using the Laravel framework and utilizes the Laravel Jetstream authentication system for user registration and authentication.

The application follows the Model-View-Controller (MVC) design pattern, allowing for an organized and modular structure. The view layer is styled combining the Tailwind CSS framework and Boostrap5.

## Function 

The first step is to register as a club to be able to log in. Upon accessing the application, you can navigate through the team menu, where you'll find a button that will take you to the matches section. However, please note that if there are fewer than two registered teams, this option won't be available. Additionally, thanks to the Jetstream authentication system, you'll have the ability to perform operations such as logging out, editing, or deleting your account.

We have implemented a complete CRUD (Create, Read, Update, Delete) system for both teams and matches, utilizing forms to facilitate interaction with the application.

## Requirements

Before being able to manage teams and matches, users need to register and authenticate in the application. This ensures the security and protection of the tournament data.

## Technologies Used

The application has been developed using the following technologies and tools:

- **Laravel**: PHP framework that provides a robust and efficient structure for web application development.
- **Tailwind CSS**: Design framework that facilitates the creation of attractive and responsive interfaces.
- **Laravel Breeze**: Built-in authentication system in Laravel that streamlines the user registration and authentication process.
- **MySQL**: Relational database management system used to store the application data.

## Installation and Configuration

To run the application on your local environment, follow these steps:

1. Clone the repository from GitHub: `git clone <REPOSITORY_URL>`
2. Install project dependencies: `composer install`
3. Install the npm dependencies: `npm install`
4. Copy the `.env.example` file and rename it to `.env`. Configure the environment variables, such as the database connection.
5. Generate a new application key: `php artisan key:generate`
6. Run the database migrations: `php artisan migrate`
7. Start the local server: `php artisan serve`
8. In a new terminal window, compile the frontend assets using Vite: `npm run dev`

Great! You can now access the application from your local browser using the URL provided by the local server.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
