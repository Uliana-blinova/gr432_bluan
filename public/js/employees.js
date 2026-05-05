let selected = document.querySelectorAll('select');
selected.forEach(select => {
    select.addEventListener('change', ()=>{
        let value = select.value;
        let id = select.id;
        let data_value = document.querySelector('input[name=csrf_token]').value;
        let object = {
            role: value,
            employee: id,
            csrf_token: data_value,
        }
        console.log(object);
        fetch('http://localhost/pop-it-mvc/employees/change_role', {
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
