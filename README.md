# Domain-Driven Design (DDD) in Laravel

This is a simple web application built using Domain-Driven Design (DDD) and Hexagonal Architecture. The application leverages several design patterns and principles to ensure a clean and maintainable codebase.

## Features

- **Domain-Driven Design (DDD)**: Focuses on the core domain and its logic, allowing for a more intuitive and flexible design.
- **Hexagonal Architecture**: Separates the application's core logic from external concerns, such as user interfaces and databases, promoting testability and adaptability.
- **CQRS (Command Query Responsibility Segregation)**: Separates read and write operations to optimize performance and scalability.
- **Decorator Pattern**: Enhances the functionality of existing classes without modifying their structure, promoting code reuse.
- **Repository Pattern**: Provides a centralized way to manage data access, abstracting the underlying data storage mechanism.
- **Action Domain Responder**: Replaces the traditional MVC pattern, allowing for a more straightforward handling of user actions and responses.
- **In-Memory Data Handling**: Utilizes in-memory data management to improve performance by reducing database calls during certain operations.
- **Doctrine ORM**: Implements Doctrine ORM for robust data mapping and persistence, allowing for complex queries and relationships while maintaining a clear separation between domain logic and data access.

By integrating in-memory data handling and utilizing Doctrine ORM, the application enhances its performance and maintains a clean architecture that aligns with DDD principles.

## Installation

To install and run this application locally, follow these steps:

1. Clone the repository:

```
git clone https://github.com/a0xh/Laravel-DDD.git
```

2. Navigate to the project directory:

```
cd Laravel-DDD
```


3. Install dependencies:

```
composer install
```


4. Set up your environment variables (if applicable).

5. Run the application:

```
php -S localhost:8000 -t public
```
