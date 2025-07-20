# Robot Arm Control Panel

Welcome to the Robot Arm Control Panel project!  
A complete web-based solution to control a 6-DOF robotic arm using sliders, with the ability to save, load, run, and remove poses—all connected to a MySQL database via PHP.



##  Project Overview

This system provides:
- A sleek and interactive user interface to control 6 servo motors.
- The ability to save current motor positions (pose) to a database.
- The option to run saved poses on the robot.
- A soft-delete feature to remove saved poses (by setting status = 0, not hard-deleting them).
- All changes reflected dynamically in a pose table.



##  Technologies Used

| Layer       | Technology       |
|-------------|------------------|
| Frontend    | HTML, CSS, JavaScript |
| Backend     | PHP              |
| Database    | MySQL (via phpMyAdmin) |
| Server      | XAMPP (Localhost) or Apache server |



##  Button Functionality

| Button     | Functionality |
|------------|----------------|
| Save Pose | Saves current motor angles (sliders) into the database. |
| Run       | Executes the current angles immediately on the robot. |
| Load      | Loads a saved pose from the table into the sliders. |
| Remove    | Marks the pose as inactive (`status = 0`) via update_status.php. |
| Reset     | Resets all sliders to 90° (neutral position). |

