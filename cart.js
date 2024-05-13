var cart=[]
function addtocart(item){
    cart.push(item);
}
document.querySelectorAll('.addtocartBTN').forEach(button =>
{
    button.addEventListener('click',function(){
        let itemname = this.parentNode.querySelectorAll('h3').innerText;
        addtocart(item);
    }


)}
)