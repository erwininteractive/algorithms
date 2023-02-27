fn quicksort(arr: &mut [i32]) {
    if arr.len() > 1 {
        let pivot = partition(arr);
        quicksort(&mut arr[..pivot]);
        quicksort(&mut arr[pivot + 1..]);
    }
}

fn partition(arr: &mut [i32]) -> usize {
    let pivot = arr.len() - 1;
    let mut i = 0;
    for j in 0..pivot {
        if arr[j] < arr[pivot] {
            arr.swap(i, j);
            i += 1;
        }
    }

    arr.swap(i, pivot);
    i
}

fn main() {
    let mut arr = [5, 2, 8, 10, 4, 12, 9];

    quicksort(&mut arr);
    println!('{:?}', arr);
}
