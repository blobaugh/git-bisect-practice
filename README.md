Git Bisect Practice
===================

WDS Git Bisect

**Note:** This tutorial is assumed from the terminal. GUI clients should have this capability also but due to the wide variety of clients it is impossible to cover them all. The terminal will always work this way.

Git Bisect is a powerful tool that helps you very quickly find where bugs were created in your git repo commit history. Instead of spending hours digging through the code, with a known good commit and a known bad commit git bisect can take your debugging time from hours or days down to minutes. Git bisect does this by taking the two knowns and slicing them in half, that commit is checked and marked good or bad and then the commits are sliced again. This happens until the commit with the bug is found. Even on a repo with hundreds of commits in between the good and bad spots git bisect will be able to help you locate the bug in a timely fashion.

This repo contains a WordPress plugin that has a simple shortcode to add two numbers together and display it, like so:

```
[add a=2 b=2]
```

The output should be

```
Your calculation 2 + 2 = 4
```

All fine and dandy, but lets try changing *b* to *3*

```
[add a=2 b=3]
```

The output now is

```
Your calculation 2 + 3 = 4
```

Whoops! That is incorrect. Git bisect to the rescue!

There are 4 git commands you should know with

```
git bisect start
git bisect good
git bisect bad
git bisect reset
```

Lets get started!

At this point you should have a WordPress install setup with this repo checkout and activated as a plugin. Go ahead and create a post with the short code used in it.

Open your terminal and navigate to the directory containing the plugin. Once there run

`git bisect start`

Git is now in bisect mode and ready to accept the known good commit. This is a commit without the bug. For our purposes here the commit is 1df0e52. Tell git about the good commit with:

`git bisect good 1df0e52`

For the known bad location we can simply use HEAD which is an alias to the most recent commit:

`git bisect bad HEAD`

After running this command you should see something like:

```
Bisecting: 5 revisions left to test after this (roughly 3 steps)
[0fc927b2898093939ab1c0ae92fceb174165c52a] Updating readme with usage details
```

Test the code, in our case simply refresh the page with the short code on it, and mark the result accordingly.

In this instance the output is still bad so we need to mark it with

`git bisect bad`

Each time you mark the commit good or bad you will receive a detailed out put letting you know which commit you are on and how many more commits there are to check:

```
Bisecting: 2 revisions left to test after this (roughly 1 step)

[e57420afba78344090d3f93c870e95a7789d6b16] Making the display prettier

```

If the commit was good we would mark it with 



`git bisect good`

Keep marking commits until git is satisfied it has found the bug. When it is you should receive output similar to:

```

c390d07a4ab72e88a5679070cf43cd085b54993b is the first bad commit
commit c390d07a4ab72e88a5679070cf43cd085b54993b
Author: blobaugh <ben@lobaugh.net>
Date:   Wed Sep 24 07:16:32 2014 -0700

Changed display of output to show the formula

:100644 100644 da4b3be49edd7982804d2e64e336af887e0ced8f a0d6e5f8ac706ea8c42c609b72e007fa8fef469b M	git-bisect-practice.php

```

Then all you have to do is see what was changed in that commit and you have your bug!

When you are satisfied you found the bug the last thing to do is to reset git to its original state. That can be done with

`git bisect reset`

Happy bug hunting!
