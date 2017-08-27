# Catalogue viewer

This repository contains a conceptual webapplication which allows the following:

* **Step 1**: Upload a .csv file, content which will be written to a MySQL database
	* `database/content.csv` is a sample file to test upload functionality
	* `database/content.sql` is the corresponding schema for the MySQL database  
* **Step 2**: Visualize and search the content using a treeviewer
  


##### Setup database connection :

Edit the `include/connect.php ` file and change the variables `db_host` , `db_user` , `db_pass` , `db_database` and `db_table` with values which reflect your own configuration.
  

## Frameworks and libraries

Minimalistic layout of the pages was built with :

* [Bootstrap](http://getbootstrap.com/) **v3.3.7** 
* [Bootstrap Tree View](https://github.com/jonmiles/bootstrap-treeview)  **v1.2.0**
* [Font Awesome](http://fontawesome.io) **v4.7.0** 