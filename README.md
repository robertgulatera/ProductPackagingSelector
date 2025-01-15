# ProductPackagingSelector

## Overview
**ProductPackagingSelector** is a web-based application built with **Laravel** that helps businesses select the most appropriate packaging for products based on attributes like size, weight, and fragility. This tool helps streamline the packaging process by automating packaging material suggestions based on product characteristics.

## Features
- Automates packaging selection based on product attributes.
- Customizable packaging rules (size, weight, fragility, etc.).
- Laravel framework for a flexible and scalable solution.
- Ready for integration into a broader business workflow.

## Table of Contents
- [Installation](#installation)
- [Usage](#usage)
- [Testing](#testing)
- [Contributing](#contributing)
- [License](#license)

## Installation

### Prerequisites
Before starting, make sure you have the following installed:
- **PHP 7.4+**
- **Composer** (Dependency Manager for PHP)
- **Laravel 8.x** or later
- **VSCode** (Visual Studio Code)

### Steps to Install

1. **Clone the repository**:
   Open VSCode, then open a terminal in VSCode (View -> Terminal) and run the following command to clone the repository:
   ```bash
   git clone https://github.com/robertgulatera/ProductPackagingSelector.git
   cd ProductPackagingSelector
   ```

2. **Open the project in VSCode**:
   To open the project in VSCode, navigate to the project folder and open it:
   ```bash
   code .
   ```

3. **Install Composer dependencies**:
   In the VSCode terminal, run the following command to install the required Laravel dependencies:
   ```bash
   composer install
   ```

4. **Set up environment variables**:
   Copy the `.env.example` file to create your `.env` file:
   ```bash
   cp .env.example .env
   ```

5. **Generate the application key**:
   Laravel requires an application key. Generate it with the following command:
   ```bash
   php artisan key:generate
   ```

6. **Set up the database** (optional):
   If your project requires a database, configure the database connection in the `.env` file. After that, you can run the migrations:
   ```bash
   php artisan migrate
   ```

7. **Start the Laravel development server**:
   To start the development server, run:
   ```bash
   php artisan serve
   ```

   By default, the application will be available at `http://localhost:8000`.

## Usage

### Running the Application

1. **Open the Application in the Browser**:
   Once the development server is running, navigate to `http://localhost:8000` in your web browser to access the **ProductPackagingSelector**.

2. **Input Product Details**:
   On the homepage or the packaging interface, input the following product attributes:
   - **Product Name**: Enter the name of the product.
   - **Size**: Choose the size of the product (e.g., "Small", "Medium", "Large").
   - **Weight**: Enter the weight of the product.
   - **Fragility**: Indicate whether the product is fragile (e.g., "Fragile", "Non-fragile").

3. **Packaging Suggestions**:
   After entering the product details, the system will suggest the appropriate packaging based on predefined rules and logic.

### Customizing the Packaging Logic

To modify or add new packaging selection rules:
1. Open the `app/Services/PackagingService.php` file in VSCode.
2. Modify the logic to account for additional product attributes or adjust the rules for selecting packaging types (such as adding new size categories or material types).

## Testing

### Running Tests

1. **Install testing dependencies**:
   Laravel comes with PHPUnit pre-configured, so there are no additional dependencies required for running tests.

2. **Run all tests**:
   To run all the tests, use the following Artisan command:
   ```bash
   php artisan test
   ```

   This will execute all tests located in the `tests/` directory.

3. **Run Specific Tests**:
   If you want to run a specific test or filter by a test class, use the `--filter` option:
   ```bash
   php artisan test --filter TestClassName
   ```

   Replace `TestClassName` with the name of the test class you want to execute.

4. **Check Test Coverage**:
   To check the test coverage, you can use the `--coverage-html` flag with PHPUnit:
   ```bash
   vendor/bin/phpunit --coverage-html coverage-report
   ```

   This will generate a `coverage-report` folder, and you can view the test coverage in your browser.

### Writing Tests

Tests are located in the `tests/` directory. You can add new tests to cover various cases, such as:
- **Packaging Selection Logic**: Test whether the correct packaging is selected based on the product's size, weight, and fragility.
- **Edge Cases**: Test with very large, very small, or unusually shaped products.

Example of a basic test:
```php
public function testPackagingSelection()
{
    $product = Product::create([
        'name' => 'Glass Bottle',
        'size' => 'Medium',
        'weight' => 0.75,
        'fragility' => 'Fragile',
    ]);

    $packaging = app(PackagingService::class)->selectPackaging($product);

    $this->assertEquals('Bubble Wrap', $packaging->material);
}
```

## Contributing

We welcome contributions to improve the **ProductPackagingSelector**! If you'd like to contribute, please follow these steps:

1. **Fork the repository** on GitHub.
2. **Clone your fork** to your local machine:
   ```bash
   git clone https://github.com/your-username/ProductPackagingSelector.git
   ```

3. **Create a new branch** for your feature or bug fix:
   ```bash
   git checkout -b feature/your-feature
   ```

4. **Make your changes** and commit them:
   ```bash
   git commit -am 'Add new feature or fix'
   ```

5. **Push your changes** to your fork:
   ```bash
   git push origin feature/your-feature
   ```

6. **Create a Pull Request** on GitHub.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

### Key Sections:
- **Installation**: Step-by-step guide for setting up the project in **VSCode** and running it locally with Laravel.
- **Usage**: How to interact with the application, input product details, and customize the packaging logic.
- **Testing**: Instructions on running tests with PHPUnit and checking test coverage.
- **Contributing**: Steps for contributing to the project, including how to fork, clone, and submit a pull request.

This guide is tailored for using **Visual Studio Code** as your development environment and **PHP Laravel** for the application framework. Let me know if you need further details or adjustments!
