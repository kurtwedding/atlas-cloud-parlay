# Atlas-Cloud-Parlay
The intention of this repository is to document, and backup all resources pertaining to virtual machines connected through AWS hosting a property viewings management system.

This repository contains all files required to build the websites and databases on the AWS RDS and AWS EC2 instances. It also contains the files required for the AWS S3 bucket.

## This repo's files
This repo contains all of the files being hosted in the AWS cloud. They are all found in `./TestWebsite/`

In `./TestWebsite/html/`, the clientPage is hosted on the client EC2 instance, and the serverPage is hosted on the server EC2 instance. 

Both EC2 instances also contain their respective dbinfo.inc files stored in `./TestWebsite/inc/` 

## Deploying the cloud services.
In order to host these services on the cloud, an AWS account was used to create 2 unique EC2 instances, one RDS instance, and one S3 bucket. The EC2 instances were used to host the websites, and the RDS instance was used to host the database. The S3 bucket is used to host a static, non-changing webpage in order to redirect to the two different webpages interfacing the database.

In order to deploy the service online, the 2 EC2 servers need to have httpd/apache, mysql, and mariadb installed.
These packages can be running the commands documented on the following webpage:

https://docs.aws.amazon.com/AmazonRDS/latest/UserGuide/CHAP_Tutorials.WebServerDB.CreateWebServer.html

The webpage above describes what to install to each EC2 in order to host the webpages and access the RDS database. The webpage also describes how to connect the EC2 instances to the RDS database, using VPC networking.

<!-- ```sudo yum install httpd```

```sudo yum install mysql, mariadb```

Once these are installed, the webpage service, httpd, must be started. This can be done by running the following command:

```sudo systemctl start httpd```

Once the webpage service has been started, the webpage can be found at the EC2 instances endpoint, found in the AWS interface for the instance.

The main ec2 login, ec2-user needs to have access to the /var/www directory so that all the files inside the directory can be seen by each other, and so that the files can be edited. This can be done by running the following command: -->

## The directory to the property viewings
The property viewings directory is hosted on a cloud service from AWS called an S3 instance, it holds a bucket and generates a static website which directs the user to either the administrative page to alter the database using a web interface, or to a client page to view all currently posted viewings. This directory can be found at:

https://atlas-cloud-parlay.s3.amazonaws.com/staticPage.html
