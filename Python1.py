#Feras Mohammad Al Momani
#Mohammad Osama AL Kawasmeh

#first try
#pivot for the first element
import time
print('\nThis is the 1000000 size \n')
c = 0
def partition(arr, start, stop):
    global c
    pivot = start # pivot
    i = start - 1
    j = stop + 1
    while True:
        while True:
            i = i + 1
            if arr[i] >= arr[pivot]:
                break
        while True:
            j = j - 1
            if arr[j] <= arr[pivot]:
                break
        if i >= j:
            arr[pivot], arr[j] = arr[j], arr[pivot]
            c += 1
            #print("Swapped:", pivot, j) # Print the indices of the swapped elements
            
            return j
        arr[i], arr[j] = arr[j], arr[i]
        c += 1
        #print("Swapped:", i, j) # Print the indices of the swapped elements
	
def quicksort(arr, start, stop):
	if start < stop:
		q = partition(arr, start, stop)
		quicksort(arr, start, q - 1)
		quicksort(arr, q + 1, stop)
	return arr

# Example usage  => Randomly
print('='*100+'\n')
start_time = time.time() 
print("start", start_time)
arr = [1, 5, 2, 4, 9]*1000000
sorted_arr = quicksort(arr, 0, len(arr) - 1)
print('The Number Of Swaps In First Pivot:',c)
#print("Sorted Array in Ascending Order:")
#print(sorted_arr)
final = time.time() - start_time
print("final:", final)
print('='*100+'\n')


#----------------------------------------------------------

#pivot from the end element
c=0
def partition2(arr, start, stop):
    global c
    pivot = stop  # pivot
    i = start - 1
    j = stop + 1
    while i < j:
        i = i + 1
        while arr[i] < arr[pivot]:
            i = i + 1
        j = j - 1
        while arr[j] > arr[pivot]:
            j = j - 1
        if j > i:
            arr[i], arr[j] = arr[j], arr[i]
            c+=1
            #print("Swapped:", i, j) # Print the indices of the swapped elements
    return i

def quicksort2(arr, start, stop):
    if start < stop:
        q = partition2(arr, start, stop)
        quicksort2(arr, start, q - 1)
        quicksort2(arr, q + 1, stop)
    return arr


# Example usage  => Randomly
start_time = time.time()
print("start", start_time)
arr = [1, 5, 2, 4, 9]*1000000
sorted_arr = quicksort2(arr, 0, len(arr) - 1)
print('The Number Of Swaps In Last Pivot:',c)
#print("Sorted Array in Descending Order:")
#print(sorted_arr)
final = time.time() - start_time
print("final", final)
print('='*100+'\n')
#-------------------------------------------------------

# pivot random element 
# Python implementation QuickSort using
# Hoare's partition Scheme.

import random

'''
The function which implements randomised
QuickSort, using Haore's partition scheme.
arr :- array to be sorted.
start :- starting index of the array.
stop :- ending index of the array.
'''
def quicksort3(arr, start, stop):
	if(start < stop):
		
		# pivotindex is the index where
		# the pivot lies in the array
		pivotindex = partitionrand(arr, start, stop)
		
		# At this stage the array is
		# partially sorted around the pivot.
		# separately sorting the left half of
		# the array and the right
		# half of the array.
		quicksort3(arr , start , pivotindex)
		quicksort3(arr, pivotindex + 1, stop)

# This function generates random pivot,
# swaps the first element with the pivot
# and calls the partition function.
def partitionrand(arr , start, stop):

	# Generating a random number between
	# the starting index of the array and
	# the ending index of the array.
	randpivot = random.randrange(start, stop)

	# Swapping the starting element of
	# the array and the pivot
	arr[start], arr[randpivot] = arr[randpivot], arr[start]
	return partition(arr, start, stop)


# Example usage  => Randomly
start_time=time.time()
print("start",start_time)
if __name__ == "__main__":
	array = [1,5,2,4,9]*1000000
	quicksort3(array, 0, len(array) - 1)
	#print("Sorted Array in Descending Order:\n",array)
print('The Number Of Swaps In Random Pivot:',c)
final=time.time()-start_time
print("final3",final)
