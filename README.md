# edumanage
The_Project_Is_Task_From_EraaSoft
# University Professor Management System

## Overview

The University Professor Management System is a comprehensive platform designed for university professors and students. It includes a dashboard for professors and a website for students, enabling efficient management of courses, lectures, exams, and student data.

## Features

### For Professors

- **Dashboard**: Manage all aspects of the course, including adding and updating lectures, exams, and student information.
- **Lecture Management**: Add, edit, and delete lecture details.
- **Exam Management**: Create and manage exams, including questions and scheduling.
- **Student Data**: View and update student information and performance.
- **Support Messages**: View messages sent by students through the support section.

### For Students

- **View Lectures**: Access and view lecture materials uploaded by professors.
- **Profile Management**: View and update personal profile information.
- **Assignments**: Submit assignments and track their status.
- **Exams**: Take exams and view results.
- **Support Messages**: Send messages to the professor through the support section and view responses.

- ## Project Structure

This project is organized into the following directories:

### `views/`
Contains the HTML templates used for rendering the user interface. This includes templates for both the professor dashboard and the student website.

### `includes/`
Includes common files and partial templates used across the project. This directory contains reusable components and snippets used in multiple views.

### `handlers/`
Contains scripts and logic for handling various operations and requests. This includes request handling for form submissions, data processing, and API interactions.

### `core/`
- **`functions/`**: Contains core PHP functions used throughout the project for tasks such as data manipulation and utility functions.
- **`validations/`**: Includes validation functions for form inputs and data, ensuring data integrity and security.

### `src/`
- **`config/`**: Configuration files for application settings, including database configurations, environment settings, and application-specific parameters.
- **`public/`**: Publicly accessible files such as CSS, JavaScript, and images. This directory is served directly by the web server.
- **`database/`**: Contains migration files and seeders for database setup. This directory is used to set up and populate the database schema.

### `admin/`
Includes the dashboard and related functionalities for professors. This directory contains the code for managing courses, lectures, exams, and student data.


