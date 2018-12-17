import axios from 'axios';

const baseUrl = 'http://app.cerulean.test/api'

const methods = {
    async get(entity, identifier = null) {
        const getUrl = `${baseUrl}/${entity}${identifier ? '/' + identifier : ''}`;
        return new Promise(async (resolve, reject) => {
            const response = await axios.get(getUrl);
            if(response.status === 200) {
                return resolve(response.data.data);
            } else {
                return reject(response.data.statusText);
            }
        });
    }
}

export default methods;