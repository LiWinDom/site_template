function copy(toCopy) {
    let text = toCopy.innerText.trim();
    navigator.clipboard.writeText(text);
}