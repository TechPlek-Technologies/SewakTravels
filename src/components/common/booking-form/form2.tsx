"use client";
import { FC, Fragment, SetStateAction, useState } from "react";
import DatePickerComponent from "../date-picker";
import TimePicker from "../time-picker";
import Autocomplete from "@/components/myComponents/autocomplete";

const FormTwo: FC = () => {
  const [startDate, setStartDate] = useState(new Date());
  const [fromValue, setFromValue] = useState<string>("");
  const [toValue, setToValue] = useState<string>("");

  // Callback function to update 'fromValue' in the parent component
  const handleFromValueChange = (value: string) => {
    setFromValue(value);
  };

  // Callback function to update 'toValue' in the parent component
  const handleToValueChange = (value: string) => {
    setToValue(value);
  };

  return (
    <Fragment>
      <form
        onSubmit={(event: React.FormEvent<HTMLFormElement>) =>
          event.preventDefault()
        }
      >
        <div className="form-group">
          <Autocomplete />
        </div>

        <div className="form-group row cab-modern-form">
          <div className="col form-control">
            <DatePickerComponent setStart={setStartDate} start={startDate} />
          </div>
          <div className="col">
            <TimePicker />
          </div>
        </div>
      </form>
      <form
        className="radio-form"
        onSubmit={(event: React.FormEvent<HTMLFormElement>) =>
          event.preventDefault()
        }
      >
        <input
          id="radio-1"
          type="radio"
          name="gender"
          value="in city"
          defaultChecked
        />
        <label htmlFor="radio-1" className="radio-label">
          in city
        </label>
        <input id="radio-2" type="radio" name="gender" value="out of city" />
        <label htmlFor="radio-2" className="radio-label">
          out of city
        </label>
      </form>
    </Fragment>
  );
};

export default FormTwo;
