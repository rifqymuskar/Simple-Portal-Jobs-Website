###################
Simple Portal Jobs Website 
###################

job portal website which connect company and expert freelancer/part-timer. It always keep
track of freelancer performance, the more job freelancer completed the more benefit they
gained. There are 2 ranks for freelancer with 2 different proposal space as monthly limit for
submitting proposal. The ranks are: rank B with 20 pts and rank A with 40 pts, at the
beginning of each month the proposal space is resetted.

*******************
Installation
*******************
1. Add Folder to HTDOCS 
2. Use mx100 for name folder
3. Open localhost/phpmyadmin
4. Create database mx100
5. Import database table from main folder ./assets/sql/mx100.sql to database mx100
6. Run webiste from localhost/mx100

*******************
Objective
*******************
As back end developer you must provide API to
- Enable freelance to submit proposal to jo post
- Enable company to view proposal for their job post

*******************
user activity
*******************
- Freelancer provide budget and completion date estimation on proposal they submit
- Freelancer can only submit one proposal to any published job
- Each application submitted by freelancer will reduce the proposal space by 2pts, so the
rank B freelancer can only submit 10times max and rank A can submit 20times max
- Employer can view proposal from freelancer for their job post

*******************
developed using
*******************
Backend : PHP ( Codeigniter ) and Javascript ( AJAX )
Frontend : Materialize CSS
Database : mySQL

*******************
User Account
*******************
1. Administrator
	- Super Admin, create a user for companies and freelancers
2. Company
	- Publish any jobs for freelancer and view proposal upload
3. Freelancer 
	- Search jobs and upload proposal

Administrator
	- username : administrator 
	- password : password

Company 1
	- username : company1
	- password : 12345678
	
Company 2
	- username : company2
	- password : 12345678

Freelancer 1
	- username : user1
	- password : 12345678
	- Rank : B
	
Freelancer 2
	- username : user2
	- password : 12345678
	- Rank : A

