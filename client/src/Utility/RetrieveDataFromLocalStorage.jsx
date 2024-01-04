function retrieveDataFromLocalStorage() {
    try {
      // Retrieve data from localStorage using the specific key
      const storedData = localStorage.getItem('sewak_travelData');
  
      if (storedData) {
        // If data is found, parse it from JSON (assuming it's stored as a JSON string)
        const parsedData = JSON.parse(storedData);
  
        // Return the parsed data
        return parsedData;
      } else {
        // If no data is found, return null or handle it based on your requirements
        return null;
      }
    } catch (error) {
      // Handle errors, such as when localStorage is not supported or there's an error during retrieval
      console.error('Error retrieving data from localStorage:', error);
      return null; // or handle the error in a way that makes sense for your application
    }
  }
  
  export default retrieveDataFromLocalStorage;