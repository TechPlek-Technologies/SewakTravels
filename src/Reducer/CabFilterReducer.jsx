



    const initialState = {
        cabTypeStatus: [],
        capacityStatus: [],
        cabOptionStatus: [],
      };
    
      export const cabFilterReducer = createReducer(initialState, {
        cabTypeStatus: (state, action) => {
          state.cabTypeStatus = action.payload;
        },
      
        capacityStatus: (state, action) => {
          state.capacityStatus = action.payload;
        },
      
        cabOptionStatus: (state, action) => {
          state.cabOptionStatus = action.payload;
        },
      });
