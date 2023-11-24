import { useEffect } from "react";

const useAutocomplete = (inputRef, onChangeCallback) => {
  useEffect(() => {
    const initializeAutocomplete = () => {
      if (!inputRef.current || !(inputRef.current instanceof HTMLInputElement)) {
        // Change the following line to console.warn if you want a less severe log
        console.error("Invalid input element reference");
        return;
      }

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
        if (autocomplete) {
          autocomplete.unbindAll();
        }
      };
    };

    // Check if inputRef is a valid input element before initializing Autocomplete
    if (inputRef.current instanceof HTMLInputElement) {
      initializeAutocomplete();
    }
  }, [inputRef, onChangeCallback]);
};

export default useAutocomplete;
