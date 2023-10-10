import React, { useContext, useState } from 'react';
import { SearchContext } from '@/context/searchContext';

const citiesInIndia = [
  'Delhi',
  'Mumbai',
  'Bangalore',
  // Add more cities here
];


interface AutocompleteProps {
  onSelection: (from: string, to: string) => void;
}

const Autocomplete: React.FC<AutocompleteProps> = ({ onSelection }) => {
  const [fromInput, setFromInput] = useState('');
  const [toInput, setToInput] = useState('');
  const [fromSuggestions, setFromSuggestions] = useState<string[]>([]);
  const [toSuggestions, setToSuggestions] = useState<string[]>([]);
  const searchContext = useContext(SearchContext);

  const handleFromInputChange = (event: React.ChangeEvent<HTMLInputElement>) => {
    const value = event.target.value;
    setFromInput(value);

    const suggestions = citiesInIndia.filter(city =>
      city.toLowerCase().includes(value.toLowerCase())
    );

    setFromSuggestions(suggestions);
  };

  const handleToInputChange = (event: React.ChangeEvent<HTMLInputElement>) => {
    const value = event.target.value;
    setToInput(value);

    const suggestions = citiesInIndia.filter(city =>
      city.toLowerCase().includes(value.toLowerCase())
    );

    setToSuggestions(suggestions);
  };

  const handleFromSuggestionClick = (suggestion: string) => {
    setFromInput(suggestion);
    setFromSuggestions([]);
    onSelection(suggestion, toInput);
  };

  const handleToSuggestionClick = (suggestion: string) => {
    setToInput(suggestion);
    setToSuggestions([]);
    onSelection(fromInput, suggestion);
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
