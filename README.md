# Photogram

Welcome to Photogram, a dynamic social media platform designed to elevate user interactions through cutting-edge technology. This project aims to redefine social media interaction by providing a unique and engaging user experience. Demo Video: <a href="https://www.linkedin.com/posts/saran-b-875a27208_socialmedia-technology-userexperience-activity-7183829656217772032-rxi2?utm_source=share&utm_medium=member_desktop">Click here</a>

### Features

- Engaging User Interface: The frontend is developed using HTML, CSS, JS, and JQuery with Bootstrap, ensuring an intuitive and responsive interface.
- Dynamic Dialog and Toast: Implemented dynamic dialog and toast using JavaScript & JQuery to enhance user interaction.
- Minified Technology: CSS and JS files are minified using Grunt for optimized performance.
- Photo Uploads: Users can immortalize memories by uploading photos.
- Blog Posts: Narrative expression is facilitated through blog posts.
- Chat API: A sophisticated Chat API integrated with a responsive AI chatbot enables real-time communication.

### Technologies Used

- Frontend: HTML, CSS, JavaScript, JQuery, Bootstrap
- Backend: PHP
- Database: MySQL

## Setup Guide

### Linux

To use the following commands in Linux Terminal:

```shell script
sudo apt-get update && sudo apt-get upgrade
```
```shell script
git clone https://github.com/saran-decoder/photogram.git
```

### Database Setup

1. Open SNALab-MySQL, MySQLWorkbench, or PHPMyAdmin.
2. Create a Database & import photogram.sql.

### Configuration

1. Open project/photogramconfig.json.
2. Fill in your database & uploading photo save path details:

```
{
	"db_server": "Your_Server",
	"db_username": "Your_Username",
	"db_password": "Your_password",
	"db_name": "Your_DB_Name",
	"base_path": "/",
	"post_path": "Your_Photo Picture Posts Save Path",
	"blog_path": "Your_Blogs Picture Posts Save Path",
	"avatar_path": "Your_Profile Picture Save Path",	
	"bgavatar_path": "Your_Profile Banner Picture Save Path"
}
```
### Usage

Once the setup is complete, users can seamlessly share moments, thoughts, and conversations on Photogram.
