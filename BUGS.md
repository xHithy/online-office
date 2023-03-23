# Known bugs

These are all the bugs I've found and haven't fixed yet.

- Sometimes dropping your blob in a room won't register and you will be placed in the 'global room'
  - Most likely caused by overlapping requests.
  - Bug seems to be eliminated after removing the default room, but by doing so I've slightly broken the functionality of the app
- Cannot go back to default room due to it causing errors with drag and drop, currently haven't found a fix
