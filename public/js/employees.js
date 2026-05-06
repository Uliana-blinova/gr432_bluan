let selected = document.querySelectorAll('select');
selected.forEach(select => {
    select.addEventListener('change', ()=>{
        let value = select.value;
        let id = select.id;
        let data_value = document.querySelector('input[name=csrf_token]').value;
        let form_data = new FormData();
        form_data.append('role', value);
        form_data.append('employee', id);
        form_data.append('csrf_token', data_value);
        fetch('http://localhost/pop-it-mvc/employees/change_role', {
            body: form_data, 
            method: 'POST'
        }
        ).then((res) => res.json())
        .then((res) => {
            console.log(res);
            
        })
    })
})
