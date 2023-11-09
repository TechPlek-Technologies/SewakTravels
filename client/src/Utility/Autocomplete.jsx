import { useEffect } from "react";

const useAutocomplete = (inputRef, onChangeCallback) => {

   
    
    useEffect(() => {
        const options = {
            componentRestrictions: { country: "in" },
            fields: ["address_components", "geometry", "icon", "name"],
            types: ["establishment"],
          };
      const autocomplete = new window.google.maps.places.Autocomplete(
        inputRef.current,
        options
      );
  
      autocomplete.addListener("place_changed", async function () {
        const place = await autocomplete.getPlace();
        const value = place.name.trim();
        onChangeCallback(value);
      });
  
      return () => {
        autocomplete.unbindAll(); // Cleanup the Autocomplete instance
      };
    }, [inputRef, onChangeCallback]);
  };

  export default useAutocomplete;