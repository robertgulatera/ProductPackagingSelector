```markdown
# ProductPackagingSelector

## Overview
**ProductPackagingSelector** is a tool designed to help select the most appropriate packaging for products based on various parameters like size, weight, and fragility. This project is built to be easy to use and customize, and can be integrated with other workflows to automate packaging decisions.

## Features
- Automated packaging selection based on product characteristics.
- Customizable rules for packaging.
- User-friendly command-line interface (CLI).
- Designed for easy use in Visual Studio Code (VSCode).

## Table of Contents
- [Installation](#installation)
- [Usage](#usage)
- [Testing](#testing)
- [Contributing](#contributing)
- [License](#license)

## Installation

### Prerequisites
Ensure you have the following installed:
- **Visual Studio Code** (VSCode) - [Download VSCode](https://code.visualstudio.com/)
- **Python 3.x** - [Download Python](https://www.python.org/downloads/)
- **pip** (Python package installer) - comes pre-installed with Python.

### Steps

1. **Clone the repository:**
   Open VSCode, then open a terminal in VSCode (View -> Terminal) and run:
   ```bash
   git clone https://github.com/robertgulatera/ProductPackagingSelector.git
   cd ProductPackagingSelector
   ```

2. **Open the project in VSCode:**
   You can open the project folder directly in VSCode by using the following command:
   ```bash
   code .
   ```

3. **Install Python extension for VSCode:**
   If you haven't already, install the Python extension for Visual Studio Code:
   - Go to the Extensions view (View -> Extensions).
   - Search for "Python" and install the extension by Microsoft.

4. **Create a virtual environment** (Optional but recommended):
   In the terminal, create a virtual environment for the project:
   ```bash
   python3 -m venv venv
   ```

   To activate the virtual environment:
   - On **Windows**:
     ```bash
     venv\Scripts\activate
     ```
   - On **macOS/Linux**:
     ```bash
     source venv/bin/activate
     ```

5. **Install dependencies:**
   Install the required Python dependencies using `pip`:
   ```bash
   pip install -r requirements.txt
   ```

6. **Verify the installation:**
   You can verify the installation by running:
   ```bash
   python product_packaging_selector.py --help
   ```
   Or by running any script in VSCode using the built-in terminal.

## Usage

### Running the Project in VSCode

1. **Open `product_packaging_selector.py`**:
   Once the project is loaded in VSCode, open the file `product_packaging_selector.py`.

2. **Running the Script**:
   You can run the script from VSCode using the terminal, or by pressing `F5` if your `launch.json` is properly set up for Python.

   Example command to run:
   ```bash
   python product_packaging_selector.py --product_name "Sample Product" --size "Medium" --weight 1.5
   ```

3. **Available Command-Line Options**:
   - `--product_name` : The name of the product (string).
   - `--size` : The size of the product (e.g., "Small", "Medium", "Large").
   - `--weight` : The weight of the product (in kilograms or pounds).
   - `--material_type` : Optional packaging material type (e.g., "cardboard", "plastic").
   - `--fragility` : Whether the product is fragile (e.g., "Fragile", "Non-fragile").

4. **Example Command**:
   ```bash
   python product_packaging_selector.py --product_name "Glass Bottle" --size "Large" --weight 0.75 --fragility "Fragile"
   ```
   This command will output packaging suggestions based on the parameters provided.

### Configuration
The packaging selection logic is based on a set of rules, which can be customized in the `product_packaging_selector.py` script or the configuration files.

- **config.json**: The configuration file contains default parameters for packaging selection, including material types, size categories, and fragility rules.

### Customizing the Packaging Rules
To modify the packaging selection logic:
1. Open `product_packaging_selector.py` in VSCode.
2. Adjust the code or add custom rules to suit your specific packaging needs.

## Testing

### Unit Tests
To test the functionality of the **ProductPackagingSelector**, the project includes unit tests. You can run these tests using VSCode's built-in terminal and test framework integration.

1. **Install Test Dependencies**:
   If you haven't installed the testing dependencies, install them using the following command:
   ```bash
   pip install -r requirements-dev.txt
   ```

2. **Run Tests in VSCode**:
   You can run tests directly from the terminal in VSCode:
   ```bash
   pytest
   ```
   Alternatively, use the **Python Test Explorer** in VSCode to run the tests interactively:
   - Install the **Python Test Explorer** extension from the Extensions Marketplace.
   - Open the Test Explorer panel in VSCode and click the "Run All" button to run the tests.

3. **Run Specific Tests**:
   To run tests for a specific module, use:
   ```bash
   pytest test_product_packaging.py
   ```

4. **Check Test Coverage**:
   To check the test coverage, run:
   ```bash
   pytest --cov=product_packaging_selector
   ```

## Contributing
We welcome contributions to improve the **ProductPackagingSelector**! If you'd like to contribute, follow these steps:

1. **Fork the repository**.
2. **Clone your fork** to your local machine:
   ```bash
   git clone https://github.com/your-username/ProductPackagingSelector.git
   ```
3. **Create a new branch**:
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
6. **Create a Pull Request**.

## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

```

### Key Differences in This Version:
- The setup and installation steps are described in the context of **VSCode**.
- Instructions on using VSCode's integrated terminal and features (like the Python extension and Test Explorer) are included.
- Running the script and tests is described with a focus on how to do so within the VSCode environment.

Let me know if you'd like further adjustments or need additional details in the README!
