<template>
  <div>
    <form @submit.prevent="handleSubmit">
      <div v-if="step === 1">
        <h2>Step 1: Personal Information</h2>
        <label>
          First Name:
          <input type="text" v-model="formData.first_name" required>
        </label>
        <br>
        <label>
          Last Name:
          <input type="text" v-model="formData.last_name" required>
        </label>
        <br>
        <label>
          Business Name:
          <input type="text" v-model="formData.business_name" required>
        </label>
        <br>
        <label>
          Email Address:
          <input type="email" v-model="formData.email" required>
        </label>
        <br>
        <button @click="nextStep">Next</button>
      </div>
      <div v-else-if="step === 2">
        <h2>Step 2: Contact Information</h2>
        <label>
          Phone Number:
          <input type="tel" v-model="formData.phone" required>
        </label>
        <br>
        <label>
          Country:
          <input type="text" v-model="formData.country" required>
        </label>
        <br>
        <label>
          State:
          <input type="text" v-model="formData.state" required>
        </label>
        <br>
        <label>
          City:
          <input type="text" v-model="formData.city" required>
        </label>
        <br>
        <label>
          Password:
          <input type="password" v-model="formData.password" required>
        </label>
        <br>
        <label>
          Confirm Password:
          <input type="password" v-model="formData.password_confirmation" required>
        </label>
        <br>
        <button @click="prevStep">Previous</button>
        <button type="submit">Register</button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      step: 1,
      formData: {
        first_name: '',
        last_name: '',
        business_name: '',
        email: '',
        phone: '',
        country: '',
        state: '',
        city: '',
        password: '',
        password_confirmation: ''
      }
    };
  },
  methods: {
    nextStep() {
      this.step++;
    },
    prevStep() {
      this.step--;
    },
    handleSubmit() {
      // Handle form submission
      // You can access the form data using this.formData
    }
  }
};
</script>
