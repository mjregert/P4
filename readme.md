#CSCI E-15 Project 4:  CampMonkey

##Live URL
http://p4.codemonkey42.com

You can also access the live site for this project via the link for P4 in Project 1's page http://p1.codemonkey42.com

##Description
As a leader with the Cub Scouts and Boy Scouts of America, we’re always trying to find a good way to keep track of the various campsites that we’ve used and ones that are available for us as well as gather feedback about the facilities for future reference.  The project will be a campsite listing and review site.  If a user logs in, they will be able to add campsites and reviews of the campsites can be submitted.

Currently, roles is not implemented so all users logged in can perform all CRUD operations.  I'd like to add in the future roles so users can only add or edit, while admins can delete.  

In addition, I'd like to add a star rating for the reviews, and a many-to-many table for amenities for each camp.  Both of these will complete the site and allow users to properly narrow down on what they're looking for.

##Demo
TBD

##Details for teaching team

##Outside code

## Planning document
https://docs.google.com/document/d/1ZvQ6DDeohhYfX6C6g2v_qv2qWhDLEKLf9d4QRpkzkM4/edit?usp=sharing

## CRUD operations
### Campgrounds:
- CREATE: Only available as a logged in user.  Log in as a user, then click the + icon next to the title for Campgrounds.  A form will show up to create a new campground.
 - READ: Viewable by everyone.  Go to main page.  To view an individual campground, select it from the list. The details will appear on the same page at the bottom on the left.
 - UPDATE:  Only available as a logged in user.  Log in as a user, then click the pencil icon next to the title for individual campground on the details pane.  A form will show up to edit the selected campground.
 - DELETE:  Only available as a logged in user.  Log in as a user, then click the - icon next to the title of the campground in the list of all Campgrounds.  A delete confirmation will come up.

 ### Reviews:
 - CREATE: Only available as a logged in user.  Log in as a user, then click the + icon next to the Reviews title for a selected campground.  A form will show up to create a new review.
  - READ: Viewable by everyone.  Go to main page.  To view an individual campground, select it from the list. The reviews for that campground will appear on the same page at the bottom on the right.
  - UPDATE: I did not implement this for review.  Many times a review, once submitted cannot be edited.
  - DELETE: I did not implement this for review.  Many times a review, once submitted cannot be deleted.  Once I get roles in place, this probably fall under an admin role operation.
  
