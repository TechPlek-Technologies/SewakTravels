import React, { useState } from "react";

interface AutocompleteProps {
    onFromValueChange: (value: string) => void;
    onToValueChange: (value: string) => void;
  }
  
  const citiesInIndia = [
    "Delhi",
    "Mumbai",
    "Bangalore",
    // Add more cities here
  ];
  
  const Autocomplete: React.FC<AutocompleteProps> = ({
    onFromValueChange,
    onToValueChange,
  }) => {
    const [fromInput, setFromInput] = useState<string>("");
    const [toInput, setToInput] = useState<string>("");
    const [fromSuggestions, setFromSuggestions] = useState<string[]>([]);
    const [toSuggestions, setToSuggestions] = useState<string[]>([]);
  
    const handleFromInputChange = (
      event: React.ChangeEvent<HTMLInputElement>
    ) => {
      const value = event.target.value;
      setFromInput(value);
  
      // Filter cities based on input
      const suggestions = citiesInIndia.filter((city) =>
        city.toLowerCase().includes(value.toLowerCase())
      );
  
      setFromSuggestions(suggestions);
      onFromValueChange(value); // Update parent component's 'fromValue'
    };
  
    const handleToInputChange = (event: React.ChangeEvent<HTMLInputElement>) => {
      const value = event.target.value;
      setToInput(value);
  
      // Filter cities based on input
      const suggestions = citiesInIndia.filter((city) =>
        city.toLowerCase().includes(value.toLowerCase())
      );
  
      setToSuggestions(suggestions);
      onToValueChange(value); // Update parent component's 'toValue'
    };
  
    const handleFromSuggestionClick = (suggestion: string) => {
      setFromInput(suggestion);
      setFromSuggestions([]);
      onFromValueChange(suggestion); // Update parent component's 'fromValue'
    };
  
    const handleToSuggestionClick = (suggestion: string) => {
      setToInput(suggestion);
      setToSuggestions([]);
      onToValueChange(suggestion); // Update parent component's 'toValue'
    };
  

  return (
    <div>
      <div className="form-group">
        <input
          type="text"
          className="form-control"
          placeholder="From"
          value={fromInput}
          onChange={handleFromInputChange}
        />
        <img src="/assets/images/icon/from.png" className="img-fluid" alt="" />
        {/* Display suggestions */}
        <ul>
          {fromSuggestions.map((suggestion, index) => (
            <li
              key={index}
              onClick={() => handleFromSuggestionClick(suggestion)} // Handle click
            >
              {suggestion}
            </li>
          ))}
        </ul>
      </div>
      <div className="form-group">
        <input
          type="text"
          className="form-control"
          placeholder="To"
          value={toInput}
          onChange={handleToInputChange}
        />
        <img src="/assets/images/icon/from.png" className="img-fluid" alt="" />
        {/* Display suggestions */}
        <ul>
          {toSuggestions.map((suggestion, index) => (
            <li
              key={index}
              onClick={() => handleToSuggestionClick(suggestion)} // Handle click
            >
              {suggestion}
            </li>
          ))}
        </ul>
      </div>
    </div>
  );
};

export default Autocomplete;
