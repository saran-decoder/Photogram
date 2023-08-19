# Welcome My Photogram

Photogram is a PHP based social midia website, which supports exclusive media content, post image chatting service.


### Linux

To use the following commands in Linux Terminal:
```shell script
sudo apt-get update && sudo apt-get upgrade
```
```shell script
git clone https://github.com/saran-decoder/photogram.git
```

### Setup Guide

1. Open SNALab-MySQL or MySQLWorkbench or PHPMyAdmin, create a Database & import photogram.sql.
2. Open `project/photogramconfig.json` & fill your database & uploading photo save path details.
```
{
	"db_server": "Your_Server",
	"db_username": "Your_Username",
	"db_password": "Your_password",
	"db_name": "Your_DB_Name",
	"base_path": "/",
	"upload_path": "Your_Uploading Photo Save Path"
}
```
