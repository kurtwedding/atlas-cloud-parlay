# Atlas-Cloud-Parlay
The intention of this repository is to document, and backup all resources pertaining to virtual machines connected through AWS hosting a property viewings management system.

This repository contains all files required to build the websites and databases on the AWS RDS and AWS EC2 instances.


## Deploying the cloud services.
In order to host my services on the cloud, an AWS account was used to create 2 unique EC2 instances, one RDS instance, and one S3 bucket. The EC2 instances were used to host the websites, and the RDS instance was used to host the database. The S3 bucket is used to host a static, non-changing webpage in order to redirect to the two different webpages interfacing the database.

## The directory to the property viewings
The property viewings are hosted on a cloud service from AWS called an S3 instance, it holds a bucket and generates a static website which directs the user to either the administrative page to alter the database using a web interface, or to a client page to view all currently posted viewings.

https://tutorial-bucket-349.s3.amazonaws.com/index.html
