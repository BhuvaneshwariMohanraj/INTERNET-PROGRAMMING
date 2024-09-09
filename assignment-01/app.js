document.addEventListener('DOMContentLoaded', function () {
    const taskForm = document.getElementById('task-form');
    const pendingTaskList = document.getElementById('pending-tasks');
    const completedTaskList = document.getElementById('completed-tasks');

    const filterAllBtn = document.getElementById('filter-all');
    const filterPendingBtn = document.getElementById('filter-pending');
    const filterCompletedBtn = document.getElementById('filter-completed');

    let tasks = [];

    taskForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const taskTitle = document.getElementById('task-title').value;
        const taskDesc = document.getElementById('task-desc').value;
        const taskDue = document.getElementById('task-due').value;

        if (validateTask(taskTitle, taskDesc, taskDue)) {
            const task = { title: taskTitle, desc: taskDesc, due: taskDue, completed: false };
            tasks.push(task);
            addTaskToDOM(task);
        } else {
            alert("Please fill out all fields correctly.");
        }
    });

    function validateTask(title, desc, due) {
        const titleValid = title.trim() !== '';
        const descValid = desc.trim() !== '';
        const dueValid = due !== '';
        return titleValid && descValid && dueValid;
    }

    function addTaskToDOM(task) {
        const taskList = task.completed ? completedTaskList : pendingTaskList;

        const newTask = document.createElement('li');
        newTask.classList.add('task-item');
        if (task.completed) newTask.classList.add('completed');

        newTask.innerHTML = `
            <input type="checkbox" class="complete-task" ${task.completed ? 'checked' : ''}>
            <h3>${task.title}</h3>
            <p>${task.desc}</p>
            <small>Due: ${task.due}</small>
            <button class="edit-task">Edit</button>
            <button class="delete-task">Delete</button>
        `;

        taskList.appendChild(newTask);
        taskForm.reset();

        // Event listener for completion
        newTask.querySelector('.complete-task').addEventListener('change', function () {
            task.completed = this.checked;
            updateTaskList();
        });

        // Event listener for deletion
        newTask.querySelector('.delete-task').addEventListener('click', function () {
            const index = tasks.indexOf(task);
            tasks.splice(index, 1);
            updateTaskList();
        });
    }

    function updateTaskList() {
        pendingTaskList.innerHTML = '';
        completedTaskList.innerHTML = '';

        tasks.forEach(task => {
            addTaskToDOM(task);
        });
    }

    filterPendingBtn.addEventListener('click', function () {
        pendingTaskList.innerHTML = '';
        completedTaskList.innerHTML = '';

        tasks.filter(task => !task.completed).forEach(task => {
            addTaskToDOM(task);
        });
    });

    filterCompletedBtn.addEventListener('click', function () {
        pendingTaskList.innerHTML = '';
        completedTaskList.innerHTML = '';

        tasks.filter(task => task.completed).forEach(task => {
            addTaskToDOM(task);
        });
    });

    filterAllBtn.addEventListener('click', function () {
        updateTaskList();
    });
});
