function onItemClick (args) {


    let clickedElement = args.target;
    let id = clickedElement.dataset.id;
    let oldStatus = clickedElement.dataset.status;

    let newStatus = oldStatus === 'complete' ? 'incomplete' : 'complete';


    fetch('/ajax.php', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            id,
            action: 'toggle-state',
            status: oldStatus
        })
    }).then((response) => {
        return response.json()
    }).then(data => {
        if(data.status === 'success') {
            clickedElement.className = newStatus;
            clickedElement.setAttribute('data-status', newStatus);
        } else {
            alert('An error occurred while saving the record')
        }
    }) ;
}

document.querySelectorAll('.items li').forEach((e) => {
    e.addEventListener('click', onItemClick)
})





document.querySelector('.add-item-button').addEventListener('click', function() {
    let text =  document.getElementById('input').value;

    if(text === '') {
        return alert('Please fill in the required fields');
    }


    fetch('/ajax.php', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            action: 'add-todo',
            text
        })
    }).then((response) => {
        return response.json()
    }).then(data => {
        document.getElementById('input').value = '';

        let element = document.createElement('li');
        element.innerText = text;
        element.setAttribute('data-status', 'incomplete');
        element.className = 'incomplete';
        element.setAttribute('data-id', data.id);
        element.addEventListener('click', onItemClick)

        let parent = document.querySelector('.items');

        parent.insertBefore(element, parent.firstChild);
    }) ;

});