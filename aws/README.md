# How to use AWS

Elastic Compute Cloud (EC2)

AWS
Get AWS Educate
$100.00

Go to My Accounts
Management Console

-> Open EC2, RDS, and ElastiCache

# Start with RDS (if using DynamoDB, use a different database engine)
Click on Instances
- Launch DB Instance
- Use Amazon Aurora
- Use Dev/Test MariaDB 
Specify DB Details
--DB Instance Class (specifies how big of a machine you want)
--- go with micro 1gb ram
-- Storage Type: General Purpose
-- Allocated Storage: 5GB
-Settings
-- DB Instance Identifier
-- Master Username: root
-- Master Password: (make a password)

# Next: Configure Advanced Settings
Netowrk and security
-- VPC Default
-- Subnet Group default
-- Publicly Accessible Yes
-- Availability Zone No preference
-- VPC SEcurity Group(s) Create a new security group

-> Launch

# RDS Dashboard (For MySQL)
- Endpoint: given, remove port number at the end
-> open mysql workbench
-- Host nae is end point
- change port number

# EC2 Instance
->Launch Instance
// use Ubuntu Server
-> Select Ubuntu
-> Accept Default General Purpose (use micro version) 
-> Review and Launch
// -> by default it'll allow you to ssh from anywhere
-> Edit Security Groups
// Edit only from my ip
-> Launch
-> Create a new key pair
-> Key Pair Name: info344whatevername
-> Download Key Pair
// pem file is a plain text file, private key value DO NOT put into github repo 
-> Launch Instance
-> View Instance
// creates a new security group
-> click on instance
// you can see public DNS server
-> Actions, How to connect to your instance, copy the example thing to where the pem file is located put into terminal
// paste in command, say yes
// when it says unprotected private key file
// right click on pem file and change privilege 
// can also do chmod go-r pem file
// then past example thing into code
then you're in ubuntu
sudo apt get ubuntu
you can exit by typing 'exit'
to add provisioning script al you have to do is ssh -i and the example code and put in quotes sudo bash blah blah 

# EC2 Talk to RDS
EC2 go to security group
add sucurity instance
edit, create mysql/aurora
for source, custom IP, sg (default for ec2 instancee)


DON'T FORGET TO DO NPM INSTALL


when in ubunto and aws
do pm2 start
pm2 start shows everything that is running
pm2 stop 0 can start or stop server