import ReactDatePicker from 'react-datepicker';
import "react-datepicker/dist/react-datepicker.css";


const DatePickerComponent = ({ setStart, start }) => {
    return <ReactDatePicker selected={start ? start : null} onChange={(date) => setStart(date)} id="datepicker" className="datepicker-main" dateFormat="dd MMMM" placeholderText="Pickup Date" />;
  };
  
  export default DatePickerComponent;