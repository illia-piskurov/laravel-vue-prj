<template>
  <div class="array-container">
    <h2>Наш массив:</h2>
    <ul>
      <li v-for="(item, index) in items" :key="index" class="array-item">
        {{ item }}
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'ArrayDisplay',
  data() {
    return {
      items: []
    }
  },
  mounted() {
    // Делаем запрос к бэку
    fetch('http://localhost:3000/array')
      .then(res => res.json())
      .then(data => {
        this.items = data
      })
      .catch(err => console.error('Ошибка запроса:', err))
  }
}
</script>

<style scoped>
.array-container {
  font-family: Arial, sans-serif;
  max-width: 400px;
  margin: 20px auto;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 8px;
  background-color: #f9f9f9;
}

.array-item {
  padding: 6px 10px;
  margin: 4px 0;
  background-color: #e0f7fa;
  border-radius: 4px;
  list-style: none;
  text-align: center;
  font-weight: bold;
}
</style>
