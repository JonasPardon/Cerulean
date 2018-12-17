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
                return reject(response.statusText);
            }
        });
    },
    async post(entity, object) {
        const postUrl = `${baseUrl}/${entity}/`;

        return new Promise(async (resolve, reject) => {
            const response = await axios.post(
                postUrl,
                object
            );
            if(response.status === 201) {
                return resolve(response.data.data);
            } else {
                return reject(response.statusText);
            }
        });
    },
    async patch(entity, identifier, object) {
        const patchUrl = `${baseUrl}/${entity}/${identifier}`;

        return new Promise(async (resolve, reject) => {
            const response = await axios.patch(
                patchUrl,
                object
            );
            if(response.status === 200) {
                return resolve(response.data.data);
            } else {
                return reject(response.statusText);
            }
        });
    },
    async delete(entity, identifier) {
        const deleteUrl = `${baseUrl}/${entity}/${identifier}`;

        return new Promise(async (resolve, reject) => {
            const response = await axios.delete(deleteUrl);

            if (response.status === 200) {
                return resolve(response.data.data);
            } else {
                return reject(response.statusText);
            }
        });
    }
}

export default methods;