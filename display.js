index=0;
    function displayimg(){

    a=document.getElementsByClassName("slides")
    for(i=0;i<a.length;i++)
        a[i].style.display="none"

    if(index==a.length){ index=0}
    a[index].style.display="block"
    index++
    setTimeout(displayimg,(2000))

}