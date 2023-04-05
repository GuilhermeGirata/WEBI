function showInput() {
    var text = document.getElementById("text").value;

    const adicionar = document.createElement("li")
    adicionar.innerHTML = text
    document.getElementById("list").appendChild(adicionar);
}