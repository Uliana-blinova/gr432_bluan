let selected = document.querySelectorAll('select');
selected.forEach(select => {
    select.addEventListener('change', ()=>{
        let value = select.value;
        let id = select.id;
        let object = {
            role: value,
            employee: id
        }
        fetch('/employees/change_role', {
            body: JSON.stringify(object), 
            method: 'POST',
            headers: {
                'Content-Type':'application/json'
            }
        }
        ).then((res) => res.text())
        .then((res) => {
            console.log(res);
            
        })
    })
})
