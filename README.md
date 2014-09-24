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
Bisecting: 0 revisions left to test after this (roughly 0 steps)

[c390d07a4ab72e88a5679070cf43cd085b54993b] Changed display of output to show the formula

```

  
