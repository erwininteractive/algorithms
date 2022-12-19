fn quickSearch(list: Vec<i32>, key: i32) -> bool {
    for item in list {
        if item == key {
            return true;
        }
    }

    return false;
}
