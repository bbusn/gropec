# Gropec - Sport entre amis

Welcome to Gropec, a Progressive Web Application (PWA) designed to enhance your sport productivity and organization. 
This README provides essential information for development and maintenance of the project.

![Logo](https://benoitbusnardo.fr/assets/images/projects/gropec/gropec-logo.png)

## Screenshots

![App Screenshot](https://benoitbusnardo.fr/assets/images/projects/gropec/gropec-screen-2.svg)
![App Screenshot](https://benoitbusnardo.fr/assets/images/projects/gropec/gropec-screen-1.svg)

## Demonstration

App hosted here : https://gropec.fr

## Table of Contents

- [Deployement](#deployement)
- [Naming Standards](#naming-standards)

## Deployement
- Import gropec.sql
- Delete actual .htaccess content and replace it by .htaccess-deploy content
- Delete actual .site.webmanifest content and replace it by .site.webmanifest-deploy content

## Naming Standards

Consistency in naming conventions is crucial for maintainability and collaboration. 
Follow these standards throughout the project:

### HTML:
- Classes, attributes, IDs, and input names: `kebab-case`
- Quotes: "double quotes"
- File name : `snake_case.html`

### CSS:
- Variables: `var(--kebab-case)`
- Proper spacing and semicolons in property declarations
- New line for each selector and declaration
- CSS minimifed when file is done and deployed
- Dev file name : `kebab-case-dev.css`
- Build file name : `kebab-case.css`

### JavaScript:
- Variables, functions: `camelCase`
- Constants: `UPPERCASE_SNAKE_CASE`
- Class and constructor names: `PascalCase`
- Quotes: 'single quotes' or "double quotes" if written in php
- Prefer `let` over `var`
- Use arrow functions where possible
- Meaningful variable and function names
- Dev file name : `kebab-case-dev.js`
- Build file name : `kebab-case.js`

### PHP:
- Variables: `$camelCase`
- Constants: `define('UPPERCASE_SNAKE_CASE', 'value')`
- Functions: `snake_case()`
- Methods: `camelCase()`
- Classes: `PascalCase`
- Quotes: 'single quotes'
- Meaningful variable and function names
- System file name : `PascalCase.php`
- View file name : `snake_case.php`

### Images:
- Resized to maximum show size
- Maximum compression
- Prefer `webp` over `png`
- File formats : `webp`, `svg`, `png`
