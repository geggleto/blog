Basic PHP Blog
--------------

Example PHP project utilizing the newest of php open source libraries.

Project Includes:

-- Slim Framework v3

-- SlimTwig

-- Spot2


This project implements the ADR pattern, you can read more about it here.
https://github.com/pmjones/adr


Installation
------------
- Change your API key! edit the src/config.php file and change your key!
- Update your DB Connection!
- Setup your web server, the http webroot should be the public directory
- Run Composer Update
- Run the migration
- Done!

Usage
-----
Simple enough, to make posts there is a JSON API, the front page retrieves the last 5 posts
Secured functions must include a post variable with api_key set.