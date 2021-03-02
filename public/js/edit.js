function editEnd_time (i) {
        var x = document.createElement("INPUT");
        x.setAttribute("type", "text");
        x.setAttribute("id", "time");
        x.setAttribute("placeholder","__:__");
        x.setAttribute("maxlength","5");
        document.querySelector("#end_time" + i).append(x);
};