import numpy as np

# This is from a Computerphile video. Professor Thorsten Altenkirch
# shows this method in Jupyter. It requires numpy
# Original video - https://www.youtube.com/watch?v=G_UYXzGuqvM

puzzle = [[3,0,0,0,0,0,9,1,0],
          [0,0,9,0,0,3,0,0,8],
          [0,4,0,0,0,2,0,0,0],
          [0,6,0,0,5,0,0,9,7],
          [0,0,7,2,0,9,3,0,0],
          [9,3,0,0,7,0,0,5,0],
          [0,0,0,5,0,0,0,7,0],
          [6,0,0,8,0,0,4,0,0],
          [0,2,5,0,0,0,0,0,1]]

def isPossible(x,y,n) :
    global puzzle

    for i in range(9) :
        if puzzle[y][i] == n :
            return False
    
    for i in range(9) :
        if puzzle[i][x] == n :
            return False
    
    x0 = (x//3)*3
    y0 = (y//3)*3
    
    for i in range(3) :
        for j in range(3) :
            if puzzle[y0+i][x0+j] == n :
                return False
    
    return True

def solve() :
    global puzzle
    global iteration
    
    for y in range(9) :
        for x in range(9) :
            if puzzle[y][x] == 0 :
                for n in range(1,10) :
                    if isPossible(x,y,n) :
                        # Seems to work, let set it and keep going!
                        puzzle[y][x] = n

                        # KEEP GOING
                        solve()

                        # It didn't work! Putting it back to 0
                        puzzle[y][x] = 0
                return
    
    print(np.matrix(puzzle))

solve()