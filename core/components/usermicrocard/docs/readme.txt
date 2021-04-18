--------------------
UserMicroCard
--------------------
Version: 1.0.0-pl
Since: April 18th, 2021
Author: Anton Tarasov <contact@antontarasov.com>
--------------------

Displaying user data in one of two popular microformats - vCard or hCard. 

This is initial and quite simple solution, feel free to suggest ideas/improvements/bugs.

Git project: https://github.com/himurovich/usermicrocard

Docs: htps://docs.modx.com/extras/usermicrocard

USAGE
--------------------

You can create categories to link your polls too. This feature is 
for sites wich have multiple polls needed on different pages. For 
a simple usage, it's not necessary.

On the page you want to view the poll, just paste the snippet call 
in your template or resource content, like this:

[[!PollsLatest]]

TEMPLATES:

   tplVote - The main form template for the latest poll view
   tplVoteAnswer - The form template for the answers inside the main view
   tplResult - The main result template for the latest poll view
   tplResultAnswer - The result template for the answers inside the outer view

SELECTION:

   category - (Opt) will select the latest poll from the given category (id), could be multiple devided by a comma
   sortby - (Opt) to influence the normal order, order could be any field in list, defaults to id
   sortdir - (Opt) to influence the normal order direction, defaults to DESC
   [Note] No params; will select the latest poll from any category
          sortby and sortdir are normally not need to set

LINKING:

   resultResource - (Opt) when set to a resource id, this resource will be used to show the poll results
   resultLinkVar - (Opt) when using resultResource, this is the paramatername the snippet is looking for


[[!PollsResult]]

TEMPLATES:

   tpl - The main result template for the poll view
   tplAnswer - The result template for the answers inside the outer view

LINKING:

   resultLinkVar - (Opt) when using resultResource, this is the paramatername the snippet is looking for
   
   --------------------
SEO Pro
--------------------
Version: 1.3.1-pl
Author: Sterc <modx@sterc.nl>
--------------------

SEO Pro is a MODX Extra developed by Sterc. This Extra offers you guidance in the process of optimising your website for search engines. It enables you to enter focus keywords per page. Based on that input, SEO Pro provides you feedback on the SEO quality of your pagetitle, longtitle, description and alias by checking if the keywords are present.

Workflow:
1. Pick a page on your MODX website which you would like to optimise for search engines and click it.
2. Look for the field called 'Focus keywords'. Enter the keywords you would like to optimise your page for.
3. Take a look at the input fields with a 'Keywords' label. Make s  ure keywords are present here and you don't exceed the given length.
4. Save it.

Issues can be added on github.com/sterc/seopro