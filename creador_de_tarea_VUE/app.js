const appTareas = new Vue({
    el: '#app',
    data: {
      name: '',
      completed: '',
      searchQuery: '',
      tasks: []
    },
    methods: {
       addTask() {
        this.tasks.push({
          name: this.name,
          completed: false
        });
  
        this.name = '';
      },
      moveTaskToCompleted(task) {
        task.completed = true;
      },
      moveTaskToPending(task) {
        task.completed = false;
      },
      deleteTask(index) {
        this.tasks.splice(index, 1);
      },
      performSearch() {
        const query = this.searchQuery.toLowerCase();
        console.log('Término de búsqueda:', query);
      }
    },
    computed: {
      completedTasks() {
        return this.tasks.filter(task => task.completed);
      },
      pendingTasks() {
        return this.tasks.filter(task => !task.completed);
      },
      cantidadPendientes() {
        return this.pendingTasks.length;
      },
      cantidadTerminadas() {
        return this.completedTasks.length;
      },

      filteredTasks() {
        const query = this.searchQuery.toLowerCase();
        return this.tasks.filter(task => {
          return task.name.toLowerCase().includes(query);
        });
      }
    },
    created() {
      fetch('tareas.json')
        .then(response => response.json())
        .then(data => {
          this.tasks = data;
        })
        .catch(error => {
          console.error(error);
        });
    }
  });