Git Bisect Practice
===================

Git Bisect is a powerful tool that helps you very quickly find where bugs were created in your git repo commit history. Instead of spending hours digging through the code, with a known good commit and a known bad commit git bisect can take your debugging time from hours or days down to minutes. Git bisect does this by taking the two knowns and slicing them in half, that commit is checked and marked good or bad and then the commits are sliced again. This happens until the commit with the bug is found. Even on a repo with hundreds of commits in between the good and bad spots git bisect will be able to help you locate the bug in a timely fashion.
