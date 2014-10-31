 //==================\\
|| Blue Square Online ||
 \\==================//
 
Name:           Blue Square Online   
Description:    A Branded Fileshare Application that gives file owners more control of who has access to their files.
Version:        1.0
Author:         Geoffrey Burdett


 //=======\\
|| License ||
 \\=======//
 
Unless otherwise noted, this files in this program are free software: you can redistribute 
them and/or modify them under the terms of the GNU General Public License as 
published by the Free Software Foundation, either version 3 of the License, 
or any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
 
 
 //=========================\\
|| Installation Instructions ||
 \\=========================//

System Requirements: PHP5+, mySql5+

01- Document Root on Server should be /path/to/this/folder/public


02- Update _application/config/config.php
    $config['base_url']
    $config['admin_email']
 
    
03- Update _application/config/application_config.php
    $config['admin_email']
    

04- Create Database and these tables:

DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `file_location` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(10) DEFAULT NULL,
  `visibility` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `first_name` varchar(400) DEFAULT NULL,
  `last_name` varchar(400) DEFAULT NULL,
  `access_level` tinyint(4) DEFAULT NULL,
  `email` varchar(400) DEFAULT NULL,
  `pw_update_req` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

INSERT INTO `users` VALUES (1,'admin',md5('admin'),'0000-00-00 00:00:00','Admin','Admin',40,'',1)

    
05- Update _application/config/database.php
    $db['default']['hostname']
    $db['default']['username']
    $db['default']['password']
    $db['default']['database']
    
    
06-  Ensure _application/uploads file permissions are set to 777
    
    
07-  Navigate to your url and sign in with username/password as admin/admin


08-  Enjoy!